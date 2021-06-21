@extends('layouts.contact')
<style>
  table {
    margin-left: 100px;
  }

  .title {
    padding: 20px 0;
  }

  td {
    padding-left: 70px;
  }

  span {
    font-size: 10px;
    margin: 0 10px;
    color: red;
  }

  p:last-of-type {
    display: inline-flex;
  }

  .opinion {
    display: none;
  }

  .edit_button {
    margin-left: 620px;
  }

  .send {
    margin: 60px auto 30px;
  }
</style>
@section('title', '内容確認')

@section('contact')

<form action="/send" method="POST">
  @csrf
  <table>
    <tr>
      <th class="title">お名前</th>
      <td>{{$inputs->fullname}}</td>
      <td><input type="hidden" name="fullname" value="{{$inputs['fullname']}}"></td>
    </tr>
    <tr>
      <th class="title">性別</th>
      <td>
        @if($inputs->gender == 1)
        男性
        @elseif($inputs->gender == 2)
        女性
      </td>
      <td>
        <input type="hidden" name="gender" value="1">
        <input type="hidden" name="gender" value="2">
      </td>
      @endif
    </tr>
    <tr>
      <th class="title">メールアドレス</th>
      <td>{{$inputs->email}}</td>
      <td><input type="hidden" name="email" value="{{ $inputs['email'] }}"></td>
    </tr>

    <tr>
      <th class="title">郵便番号</th>
      <td>{{$inputs->postcode}}</td>
      <td>
        <input type="hidden" name="postcode" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" value="{{$inputs['postcode']}}">
      </td>
    </tr>
    <tr>
      <th class="title">住所</th>
      <td>{{$inputs->address}}</td>
      <td><input type="hidden" name="address" size="60" value="{{$inputs['address']}}"></td>
    </tr>
    <tr>
      <th class="title">建物名</th>
      <td>{{$inputs->building_name}}</td>
      <td><input type="hidden" name="building_name" value="{{ $inputs['building_name'] }}"></td>
    </tr>
    <tr>
      <th class="title">ご意見</th>
      <td>{{$inputs->opinion}}</td>
      <td><input type="hidden" name="opinion" cols="30" rows="10" value="{{ $inputs['opinion'] }}"></td>
    </tr>
  </table>
  <button name="action" value="送信" class="send">送信</button>
  <input type="submit" name="action" value="戻る" class="edit_button">
</form>
@endsection