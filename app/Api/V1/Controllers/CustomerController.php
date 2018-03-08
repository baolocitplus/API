<?php

namespace App\Api\V1\Controllers;

use Config;
use App\User;
use App\Customer;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\AddCustomerRequest;
use App\Api\V1\Requests\UpdateCustomerRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Input;

class CustomerController extends Controller
{
    public function add(AddCustomerRequest $request)
    {
        $customer = new Customer;
        $customer->name = $request->get('name');
        $customer->gender = $request->get('gender');
        if($customer->save())
             return response()
                ->json([
                    'status' => 'Thêm Customer Thành Công!'
                ]);
        else
            return $this->response->error('could_not_create_book', 500);
    }
     public function update($id)
    {
    //dd(Input::all());
         $customer = Customer::find($id);
        if(!$customer)
            throw new NotFoundHttpException;
        $customer->fill(Input::all());
        if($customer->save())
            return response()
            ->json([
                'status' => 'Update Customer Thành Công!'
            ]);
        else
            return $this->response->error('could_not_update_book', 500);
    }
     public function delete($id)
    {
        $customer = Customer::find($id);
        if(!$customer)
            throw new NotFoundHttpException;
        if($customer->delete())
           return response()
            ->json([
                'status' => 'Delete Customer Thành Công!'
            ]);
        else
            return $this->response->error('could_not_delete_book', 500);
    }
    public function getCustomer($id){
           $customer = Customer::find($id);

            if(!$customer)
                throw new NotFoundHttpException; 

         return $customer;
    }

}
