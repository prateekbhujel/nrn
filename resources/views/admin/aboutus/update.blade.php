@extends('admin.layouts.master')

@section('title', 'update About Us')

@section('content')
<div class="section-header">
  <h1>About Us</h1>
</div>

<div class="card">
  <div class="card-header">
    <h4>Update About Us</h4>
  </div>
  <div class="card-body">
  @php
$fields = [
    [
        'type' => 'hide',
        'name' => 'id',
        'value' => @$aboutus["id"],
    ],
    [
        'name' => 'column_1',
        'label' => 'Column 1',
        'type' => 'text',
        'placeholder' => 'Enter Column 1',
        'value' => @$aboutus["column_1"] ?? 'ram',
    ],
    [
        'name' => 'column_1_description',
        'label' => 'Column 1 Description',
        'type' => 'textarea',
        'value' => @$aboutus["column_1_description"] ?? 'ram',
    ],
    [
        'name' => 'column_2',
        'label' => 'Column 2',
        'type' => 'text',
        'placeholder' => 'Enter Column 2',
        'value' => @$aboutus["column_2"] ?? 'ram',
    ],
    [
        'name' => 'column_2_description',
        'label' => 'Column 2 Description',
        'type' => 'textarea',
        'value' => @$aboutus["column_2_description"] ?? 'ram',
    ],
    [
        'name' => 'column_3',
        'label' => 'Column 3',
        'type' => 'text',
        'placeholder' => 'Enter Column 3',
        'value' => @$aboutus["column_3"] ?? 'ram',
    ],
    [
        'name' => 'column_3_description',
        'label' => 'Column 3 Description',
        'type' => 'textarea',
        'value' => @$aboutus["column_3_description"] ?? 'ram',
    ],
    [
        'name' => 'column_4',
        'label' => 'Column 4',
        'type' => 'text',
        'placeholder' => 'Enter Column 4',
        'value' => @$aboutus["column_4"] ?? 'ram',
    ],
    [
        'name' => 'column_4_description',
        'label' => 'Column 4 Description',
        'type' => 'textarea',
        'value' => @$aboutus["column_4_description"] ?? 'ram',
    ],
    [
        'name' => 'column_5',
        'label' => 'Column 5',
        'type' => 'text',
        'placeholder' => 'Enter Column 5',
        'value' => @$aboutus["column_5"] ?? 'ram',
    ],
    [
        'name' => 'column_5_description',
        'label' => 'Column 5 Description',
        'type' => 'textarea',
        'value' => @$aboutus["column_5_description"] ?? 'ram',
    ],
    [
        'name' => 'column_6',
        'label' => 'Column 6',
        'type' => 'text',
        'placeholder' => 'Enter Column 6',
        'value' => @$aboutus["column_6"] ?? 'ram',
    ],
    [
        'name' => 'column_6_description',
        'label' => 'Column 6 Description',
        'type' => 'textarea',
        'value' => @$aboutus["column_6_description"] ?? 'ram',
    ],
    [
        'name' => 'column_7',
        'label' => 'Column 7',
        'type' => 'text',
        'placeholder' => 'Enter Column 7',
        'value' => @$aboutus["column_7"] ?? 'ram',
    ],
    [
        'name' => 'column_7_description',
        'label' => 'Column 7 Description',
        'type' => 'textarea',
        'value' => @$aboutus["column_7_description"] ?? 'ram',
    ],
    [
        'name' => 'column_8',
        'label' => 'Column 8',
        'type' => 'text',
        'placeholder' => 'Enter Column 8',
        'value' => @$aboutus["column_8"] ?? 'ram',
    ],
    [
        'name' => 'column_8_description',
        'label' => 'Column 8 Description',
        'type' => 'textarea',
        'value' => @$aboutus["column_8_description"] ?? 'ram',
    ],
];
@endphp

<x-cms-form 
    action="{{route('admin.aboutus.save')}}" 
    :fields="$fields"
    submitText="update about us"
    buttonPosition="right"
/>
  </div>
</div>
@endsection
