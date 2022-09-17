@include('layouts.header')
        <!--**********************************
            Sidebar end
        ***********************************-->



                <!-- row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Machine</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                {{-- <th style="width:80px;"><strong>#</strong></th> --}}
                                                <th><strong>Machine Name</strong></th>
                                                <th><strong>Geo_location</strong></th>
                                                {{-- <th><strong>Description</strong></th>
                                                <th><strong>Raised By</strong></th>
                                                <th><strong>PRICE</strong></th> --}}
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $datas)

                                            <tr>
                                                {{-- <td><strong>01</strong></td> --}}
                                                <td>{{$datas->name}}</td>
                                                <td>{{$datas->geo_location}}</td>
                                                {{-- <td>{{$datas->description}}</td> --}}
                                                {{-- <td>{{$datas->name}}</td> --}}
                                                {{-- <td><span class="badge light badge-success">Successful</span></td> --}}
                                                {{-- <td>$21.56</td> --}}
                                                <td>
													<a style="padding: 15px 30px;background-color:blue;color:white" class="dropdown-item" href="{{url('/machine/view')}}/{{$datas->eid}}">View</a>
												</td>
                                                <td>
													<a style="padding: 15px 30px;background-color:Grey;color:white" class="dropdown-item" href="{{url('/generate')}}/{{$datas->eid}}">Generate QR</a>
												</td>
                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				@include('layouts.footer')
