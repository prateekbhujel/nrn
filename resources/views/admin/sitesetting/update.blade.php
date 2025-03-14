@extends('admin.layouts.master')

@section('title', 'update About Us')

@section('content')
<div class="section-header">
  <h1>Site Setting</h1>
</div>

<div class="card">
  <div class="card-header">
    <h4>Site Setting</h4>
  </div>
  <div class="card-body">
  @php
$fields = [
    [
        'name' => 'organization_name',
        'label' => 'Organisation Name',
        'type' => 'text',
        'placeholder' => 'Enter Organization Name',
        'required'=>'true'
    ],
    [
        'name' => 'organization_motto',
        'label' => 'Organisation Motto',
        'type' => 'textarea',
    ],
    [
        'name' => 'organization_email',
        'label' => 'Organisation Email',
        'type' => 'text',
        'placeholder' => 'Enter Organization mail',
        'required'=> 'true',
    ],
    [
        'name' => 'organization_number',
        'label' => 'Organisation number',
        'type' => 'text',
        'placeholder' => 'Enter Organization email',
        'required'=> 'true',
    ],
    [
        'name' => 'organization_address',
        'label' => 'Organisation Address',
        'type' => 'textarea',
        'placeholder' => 'Enter Organisation Address ',
        'required'=> 'true',
    ],
    [
        'name'=>'about_organization',
        'label'=>'About Organization',
        'type'=>'textarea',
        'placeholder'=>'Enter Abou the organization'
    ],
    [
        'name'=> 'organization_logo',
        'label'=> 'Organization logo',
        'type'=> 'file',
    ],
    [
        'name'=> 'organization_favicon',
        'label'=> 'Organization favicon',
        'type'=> 'file',

    ],
    [
        'type' => 'hide',
        'name' => 'id',
    ]
];
@endphp

<x-cms-form 
    action="{{route('admin.sitesetting.save')}}" 
    :fields="$fields"
    :model="$aboutus"
    submitText="update Site Setting"
    buttonPosition="right"

/>
  </div>
</div>
@endsection
