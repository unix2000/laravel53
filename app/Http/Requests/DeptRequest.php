<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeptRequest extends FormRequest
{
    public function authorize()
    {
        //return false;
		return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //$rules = [];
		//return $rules;
		return [
            'dept_no' => 'required',
			'dept_name' => 'required',
			'dept_parent' => 'required|integer'
        ];
    }
	public function messages()
	{
		return [
			'dept_no.required' => '部门编号不能为空',
			'dept_name.required' => '部门名称不能为空',	
			'dept_parent.required' => '上级部门不能为空',	
		];	
	}
}
