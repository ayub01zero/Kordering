@extends('frontend.frontbody.body')
@section('interface')


<div class="container rounded bg-white mt-3 mb-2">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="{{asset('assets/img/836.jpg')}}" width="90"><span class="font-weight-bold">{{ old('name', $user->name) }}</span><span class="text-black-50">{{ old('name', $user->address) }}</span></div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <h6><a href="{{url('/')}}">Back to home</a></h6>
                    </div>
                    <h6 class="text-right">Edit Profile</h6>
                </div>
                <form action="{{ route('profile.updatee') }}" method="post" >
                  @csrf
                <div class="row mt-2">
                  <div class="col-md-6"><input readonly type="text" class="form-control" placeholder="First Name" name="name" value="{{ old('name', $user->name) }}"></div>
                  <div class="col-md-6"><input readonly type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email', $user->email) }}"></div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-6"><input type="text" class="form-control" placeholder="Phone Number" name="phone" value="{{ old('phone', $user->phone) }}"></div>
                  <div class="col-md-6"><input type="text" class="form-control" placeholder="Address" name="address" value="{{ old('address', $user->address) }}"></div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-6"><input type="text" class="form-control" placeholder="City" name="city" value="{{ old('city', $user->city) }}"></div>
                  <div class="col-md-6"><input type="date"  class="form-control" placeholder="Date of Birth" name="Date_of_Birth" value="{{ old('Date_of_Birth', $user->Date_of_Birth) }}"></div>
              </div>
              <div class="mt-5 text-right"><button type="submit" class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

    
                        {{-- <div class="flex-shrink-0 ms-2">
                            <ul class="list-inline mb-0 font-size-16">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted px-1">
                                        <i class="mdi mdi-trash-can-outline"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted px-1">
                                        <i class="mdi mdi-heart-outline"></i>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}

<style>
    body {
        background: #eecda3;
  background: -webkit-linear-gradient(to right, #eecda3, #dab83d);
  background: linear-gradient(to right, #eecda3, #dab83d);
}

.form-control:focus {
  box-shadow: none;
  border-color: #dab83d;
}

.profile-button {
  background: #dab83d;
  box-shadow: none;
  border: none;
}

.profile-button:hover {
  background: #dab83d;
}

.profile-button:focus {
  background: #dab83d;
  box-shadow: none;
}

.profile-button:active {
  background: #dab83d;
  box-shadow: none;
}

.back:hover {
  color: #dab83d;
  cursor: pointer;
}
</style>

@endsection
