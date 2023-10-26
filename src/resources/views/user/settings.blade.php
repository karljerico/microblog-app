@extends('layouts.app')

@section('content')

    @include('layouts.navbar')
    
    <div class="container mt-5">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100 border border-dark shadow">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar mb-3">
                                    <img src="https://cdn-icons-png.flaticon.com/512/456/456283.png" alt="Profile Picture" height="250px" width="250px">
                                </div>
                                @auth
                                    @if (auth()->user()->profileInformation)
                                        <h5 class="user-name">
                                            {{ auth()->user()->profileInformation->firstname ? ' ' . auth()->user()->profileInformation->firstname : '' }}
                                            {{ auth()->user()->profileInformation->middlename ? ' ' . auth()->user()->profileInformation->middlename : '' }}
                                            {{ auth()->user()->profileInformation->surname ? ' ' . auth()->user()->profileInformation->surname : '' }}
                                        </h5>
                                    @else
                                        <p>No profile information available.</p>
                                    @endif
                                @endauth
                                <h6 class="user-email">{{ auth()->user()->email }}</h6>
                            </div>
                            <div class="about">
                                <h5 class="mb-2 text-primary">About</h5>
                                @auth
                                    @if (auth()->user()->profileInformation)
                                        <p>{{ auth()->user()->profileInformation->about ? ' ' . auth()->user()->profileInformation->about : ''  }}</p>
                                    @else
                                        <p>Bio not available.</p>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100 border border-dark shadow">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-3 text-primary">Personal Details</h6>
                            </div>
                            <form method="POST" action="{{ route('profileinfo.store') }}">
                                @csrf
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" name="firstname" placeholder="Enter your first name" value="{{ !empty(auth()->user()->profileInformation->firstname) ? auth()->user()->profileInformation->firstname : '' }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="middlename">Middle Name</label>
                                        <input type="text" class="form-control" name="middlename" placeholder="Enter your middle name" value="{{ !empty(auth()->user()->profileInformation->middlename) ? auth()->user()->profileInformation->middlename : '' }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="surname">Surname</label>
                                        <input type="text" class="form-control" name="surname" placeholder="Enter your surname" value="{{ !empty(auth()->user()->profileInformation->surname) ? auth()->user()->profileInformation->surname : '' }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <label for="profile_pic">Profile Picture</label>
                                        <input type="file" class="form-control" id="profile_pic" name="profile_pic">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="about">About</label>
                                        <textarea class="form-control" name="about" placeholder="Enter anything about you" rows="3" maxlength="140" ></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary">Cancel</button>
                                        <button type="submit" class="btn btn-primary" style="margin-left: 10px">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
