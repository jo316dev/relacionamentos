@csrf

{{-- @include('admin.includes.alerts') --}}

<div class="form-group">
    <label for="">Nome</label>
    <input type="text" name="name" id="" placeholder="Insira o nome da marca" class="form-control" value="{{ $sector->name ?? old('name') }}">
</div>

   <div class="form-group">
     <button type="submit" class="btn btn-success">Enviar</button>
  </div>
