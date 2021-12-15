@extends('dashboard.layouts.main')

@section('container')
  <div class="row mt-3">
    <div class="col">
      <h2 class="mb-0">Request Admin</h2>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-lg-6">
      <p>Melalui fitur ini <b>user</b> bisa meminta kepada admin untuk bisa dijadikan sebagai admin dengan cara mengirimkan <b>username</b> beserta <b>alasan</b> anda mengapa ingin menjadi admin pada pesan <b>WhatApp</b>.</p>
      <p>Terimakasih~</p>
      <div class="dropdown-divider mt-5"></div>
      <a href="https://api.whatsapp.com/send?phone=6281912601216" class="text-decoration-none text-light btn btn-success"><i class="bi bi-whatsapp"></i><span> Hubungi WhatsApp Kami</span></a>
    </div>
  </div>
@endsection