@include('layouts.header')
@foreach ($data as$datas )
<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body pb-3">
								<div class="row align-items-center">
									<div class="col-xl-4 mb-3">
                                        <form action="{{url('log/complain')}}" method="get">
                                            @csrf
                                                                                <textarea hidden name="uid" id="scan-result-text" cols="30"
                                                                                    rows="10">{{ app('request')->input('uid') }}</textarea>
                                                                                <input type="submit" value="Raise a complain">
                                                                            </form>
										{{-- <p class="mb-2">Complaint ID </p> --}}
										{{-- <h2 class="mb-0">{{$datas->complaint_number}}</h2> --}}
									</div>
									{{-- <div class="col-xl-8 d-flex flex-wrap justify-content-between align-items-center">


                                        @if ($datas->c_status=="closed")
                                        <td style="padding: 15px 30px;background-color:rebeccapurple">Compain CLosed</td>
                                        @else
										<div class="d-flex mb-3">

											<a href="{{url('complain/close')}}/{{$datas->eid}}" class="btn btn-primary"><i class="las la-close scale5 me-3"></i>Close Complain</a>
										</div>
                                        @endif
									</div> --}}
								</div>
							</div>
							<div class="card-body pb-3 transaction-details d-flex flex-wrap justify-content-between align-items-center">
								<div class="user-bx-2 me-3 mb-3">

									<div>
										<h3>Machine Name by - {{$datas->name}}</h3>
										{{-- <span>@richardmichael</span> --}}
									</div>
								</div>


								<div class="me-3 mb-3">
									<p class="mb-2">Due Date</p>
									<h4 class="mb-0">{{$datas->created_at}}</h4>
								</div>

							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="d-xl-flex d-block align-items-start description-bx">
									<div>
										<h4 class="card-title">Machine Name :: {{$datas->Mname}}</h4>
                                        <span class="fs-12">Geo Cordinates : {{$datas->geo_location}}</span>
										<p class="description mt-4">{{$datas->description}}</p>
									</div>
									<div class="card-bx bg- ms-xl-5 ms-0">
										{{-- <img class="pattern-img" src="images/pattern/pattern11.png" alt=""> --}}
										<div class="d-flex card-ifo text-white">
                                            <img src="{{ Storage::url($datas->photo) }}" alt="" srcset="">
                                            <img src="{{  Storage::url('/images/qr')}}/{{$datas->qr_code}}.svg"" alt="" srcset="">
											{{-- <img src="images/pattern/circle.png" class="mb-4" alt=""> --}}

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					@endforeach
				</div>
            </div>
        </div>
  @include('layouts.footer')
