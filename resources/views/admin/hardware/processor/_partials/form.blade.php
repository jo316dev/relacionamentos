@csrf

{{-- @include('admin.includes.alerts') --}}

<div class="form-group">
    <label for="">Nome</label>
    <input type="text" name="name" id="" placeholder="Insira a quantidade de memoria" class="form-control" value="{{ $processor->name ?? old('name') }}">
</div>

   <div class="form-group">
     <button type="submit" class="btn btn-success">Enviar</button>
  </div>
