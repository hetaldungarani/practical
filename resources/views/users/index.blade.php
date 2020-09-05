@extends('layout.app')



@section('main-content')

<div id="datatable1_wrapper" class="dataTables_wrapper" role="grid">
    <div class="row">                    
        <div class="container-fluid">
                <h3 class="customer-title">
                    Users             
                </h3>
                @if (Session::has('success'))
                    <div class="alert alert-success">{!! Session::get('success') !!}</div>
                @endif
                <section class="box-typical box-typical-padding search-form-wrapper">
                    <div class="row">
                        <div class="col-md-6 form-group">
                           {!! Form::select('role_id', $hobbies, '', ['class' => 'form-control m-bot15','id'=>'field_hobby']) !!}
                        </div>

                        <div class="col-md-6 form-group">
                            <select class="form-control m-bot15" id="field_gender">
                                <option value="">Select Gender</option>
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>
                        </div>
                       
                    </div>
                    <section class="proj-page-add-txt table-margin form-buttons">
                        <fieldset class="form-group">
                        <button id="srchbtn" name="srchbtn" onclick="getSearch();" class="btn btn-primary btn-sm">Search</button>
                        <div class="clear"></div>
                        </fieldset>
                    </section>  
             </section>
        </div>
        <div class="col-md-12">                         
            <div class="table-responsive" id="user_container"> 
                @include('users.list')
            </div>                
        </div>                    
    </div>
</div>
@endsection