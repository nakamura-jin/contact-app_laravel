@extends('layouts.contact')
<style>
  .search {
    border: 1px solid black;
    padding: 30px;
  }

  .search th {
    padding: 20px 0;
  }

  svg {
    height: 30px;
  }

  .controll {
    display: inline-block;
  }

  .search {
    margin: 0 auto;
    padding: 12px 60px;
  }

  .reset {
    display: flex;
    justify-content: center;
    margin-top: 20px;
  }

  .data__list {
    width: 1280px;
    margin-top: 40px;
  }

  .data__list-table {
    width: 1280px;
  }

  .data__list th {
    border-bottom: 1px solid black;
    padding: 10px 40px;
  }

  .delete {
    margin-left: 30px;
    margin-top: 10px;
  }
</style>

@section('title', '管理システム')
@section('contact')
<form action="/manager/search" method="get" class="search">
  <table>
    <tr>
      <th>お名前</th>
      <td><input type="text" name="fullname" value="{{ request('fullname') }}" size="40"></td>
    </tr>
    <tr>
      <th>性別</th>
      <td>
        <label><input type="radio" name="gender" value="3" checked> 全て</label>
        <label><input type="radio" name="gender" value="1"> 男性</label>
        <label><input type="radio" name="gender" value="2"> 女性</label>
      </td>
    </tr>
    </tr>
    <tr>
      <th>登録日</th>
      <td>
        <input type="date" name="start" value="{{request('created_at')}}">
        <span> 〜 </span>
        <input type="date" name="end" value="{{request('created_at')}}">
      </td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td><input type="text" name="email" size="60"></td>
    </tr>
  </table>
  <div class="btn_search"><button id="submit" class="search">検索</button></div>
  <a href="/manager" class="reset">リセット</a>
</form>
</div>

{{ $items->links() }}


<div class="data__list">
  <table class="data__list-table" id="maybe">
    <tr>
      <th>ID</th>
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>ご意見</th>
      <th></th>
    </tr>
    @foreach($items as $item)
    <tr>
      <td class="id">{{$item->id}}</td>
      <td>{{$item->fullname}}</td>
      @if($item->gender == 1)
      <td>男性</td>
      @else
      <td>女性</td>
      @endif
      <td name="email">{{$item->email}}</td>
      <td id="opinion" class="opinion">{{ $item->opinion }}</td>
      <td>
        <form action="/delete" method="POST">
          @csrf
          <input type="hidden" name="id" value=" {{$item->id}}, ">
          <button class="delete" type="submit">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>

<script src="{{ asset('work/change.js') }}"></script>
@endsection