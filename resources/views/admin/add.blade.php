@include('layouts.header')

{{-- content start --}}
<!--Hospital updation forms starts----------------------------------------------------------------------->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Machine</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form enctype="multipart/form-data" action="{{url('/machineadd')}}" method="POST" class="needs-validation" novalidate>
                        {{-- @foreach ($data as $datas) --}}
                        @csrf

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">Enter Machine Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input value="" name="name" type="text" class="form-control"
                                            id="validationCustom01" placeholder="Enter Machine Name" required>
                                        <div class="invalid-feedback">
                                            Title
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="validationCustom03">Machine Deatils
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input value="" name="machine_details"  type="tel" class="form-control"
                                            id="validationCustom03" placeholder="Enter Machine Details" required>
                                        <div class="invalid-feedback">
                                            Descriptio
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="validationCustom03">Upload Machine Photo
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group mb-3">
                                        <div class="form-file">
                                            <input name="image" type="file" class="form-file-input form-control">
                                        </div>
                                        <span class="input-group-text">Add</span>
                                    </div>
                                </div>

                                <input  type="text" hidden value="{{ app('request')->input('uid') }}">




                                {{-- @endforeach --}}
                                <div class="mb-3 row">
                                    <div class="col-lg-8 ms-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- content end --}}
    @include('layouts.footer')
