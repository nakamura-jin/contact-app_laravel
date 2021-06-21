@extends('layouts.contact')
<style>
  span {
    font-size: 14px;
    margin: 0 5px;
    color: red;
  }

  td {
    display: flex;
    flex-direction: column;
    padding-top: 10px;
  }

  .radio {
    flex-direction: row;
  }

  .example {
    margin-left: 70px;
    color: #bbb;
  }

  .error {
    margin-left: 70px;
  }

  p:last-of-type {
    display: inline-flex;
  }

  .confirm_button {
    margin: 20px auto;
  }
</style>
@section('title', 'お問い合わせ')

@section('contact')
@if(count($errors) > 0)
<span>入力に誤りがあります</span>
@endif
<form action="/confirm" method="POST">
  @csrf
  <table>
    <tr>
      <th>お名前<span>※</span></th>
      <td>
        <input type="text" name="fullname" value="{{old('fullname')}}">
        <span class="example">例)山田　太郎</span>
        @error('fullname')
        <span class="error">{{$message}}</span>
        @enderror

      </td>
    </tr>
    <tr>
      <th>性別<span>※</span></th>
      <td class="radio">
        <label><input type="radio" name="gender" value="1" checked>男性</label>
        <label><input type="radio" name="gender" value="2">女性</label>
      </td>
    </tr>
    <tr>
      <th>メールアドレス<span>※</span></th>
      <td>
        <input type="email" name="email" value="{{old('email')}}">
        <span class="example">例)test@example.com</span>
        @error('email')
        <span class="error">{{$message}}</span>
        @enderror
      </td>
    </tr>
    <tr>
      <th>郵便番号<span>※</span></th>
      <td>
        <input type="text" name="postcode" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" value="{{old('postcode')}}" id="half">
        <span class="example">例)123-4567</span>
        @error('postcode')
        <span class="error">{{$message}}</span>
        @enderror
      </td>
    </tr>
    <tr>
      <th>住所<span>※</span></th>
      <td>
        <input type="text" name="address" size="60" value="{{old('address')}}">
        <span class="example">例)東京都渋谷区千駄ヶ谷1-2-3</span>
        @error('address')
        <span class="error">{{$message}}</span>
        @enderror
      </td>
    </tr>
    <tr>
      <th>建物名</th>
      <td>
        <input type="text" name="building_name" value="{{old('building_name')}}">
        <span class="example">例)千駄ヶ谷マンション101</span>
      </td>
    </tr>
    <tr>
      <th>ご意見<span>※</span></th>
      <td>
        <textarea name="opinion" cols="80" rows="4">{{old('opinion')}}</textarea>
        @error('opinion')
        <span class="error">{{$message}}</span>
        @enderror
      </td>
    </tr>
  </table>
  <button class="confirm_button">確認</button>
</form>　
@endsection