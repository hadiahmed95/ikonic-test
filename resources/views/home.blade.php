@extends('layouts.app')

@section('content')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/helper.js') }}?v={{ time() }}" defer></script>
  <script src="{{ asset('js/main.js') }}?v={{ time() }}" defer></script>

  <div class="container">
    <x-dashboard />
    <!-- <x-network_connections sentRequests="{{ $sent_requests }}" receivedRequests="{!! json_encode($received_requests) !!}" connections="{!! json_encode($connections) !!}" /> -->







    <div class="row justify-content-center mt-5">
      <div class="col-12">
        <div class="card shadow  text-white bg-dark">
          <div class="card-header">Coding Challenge - Network connections</div>
          <div class="card-body">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Sent Requests ({{ $sent_requests->count() }})</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Received Requests ({{ $received_requests->count() }})</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Connections ({{ $connections->count() }})</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="suggestion-tab" data-bs-toggle="tab" data-bs-target="#suggestion" type="button" role="tab" aria-controls="suggestion" aria-selected="false">Suggestion ({{ $suggestions->count() }})</button>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="my-2 shadow text-white bg-dark p-1" id="">
                  <div class="d-flex justify-content-between">
                    <table class="table table-bordered table-dark ms-1">
                      <thead>
                        <tr>
                          <th class="align-middle">Email</th>
                          <th class="align-middle">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($sent_requests as $s_request)
                          <tr>
                            <td>{{ $s_request->receiver->email }}</td>
                            <td><a href="{{ url('/remove-connection').'/'.$s_request->id }}" id="cancel_request_btn_" class="btn btn-danger me-1">Withdraw Request</a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="my-2 shadow text-white bg-dark p-1" id="">
                  <div class="d-flex justify-content-between">
                    <table class="table table-bordered table-dark ms-1">
                      <thead>
                        <tr>
                          <th class="align-middle">Email</th>
                          <th class="align-middle">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($received_requests as $r_request)
                          <tr>
                            <td>{{ $r_request->sender->email }}</td>
                            <td><a href="{{ url('/accept-request').'/'.$r_request->id }}" id="accept_request_btn_" class="btn btn-primary me-1">Accept</a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="my-2 shadow text-white bg-dark p-1" id="">
                  <div class="d-flex justify-content-between">
                    <table class="table table-bordered table-dark ms-1">
                      <thead>
                        <tr>
                          <th class="align-middle">Email</th>
                          <th class="align-middle">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($connections as $connection)
                          <tr>
                            <td>{{ ($user_id == $connection->receiver_id) ? $connection->sender->email : $connection->receiver->email }}</td>
                            <td><a href="{{ url('/remove-connection').'/'.$connection->id }}" id="cancel_request_btn_" class="btn btn-danger me-1">Remove</a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="suggestion" role="tabpanel" aria-labelledby="suggestion-tab">
                <div class="my-2 shadow text-white bg-dark p-1" id="">
                  <div class="d-flex justify-content-between">
                    <table class="table table-bordered table-dark ms-1">
                      <thead>
                        <tr>
                          <th class="align-middle">Email</th>
                          <th class="align-middle">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($suggestions as $suggestion)
                          <tr>
                            <td>{{ $suggestion->email }}</td>
                            <td><a href="{{ url('/send-request').'/'.$suggestion->id }}" id="cancel_request_btn_" class="btn btn-primary me-1">Connect</a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection