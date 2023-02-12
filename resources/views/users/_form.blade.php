
<tr>
    <td>Nama</td>
    <td>:</td>
    <td>
        <input type="text" class="form-control" name="nama">
            @error('nama')
            <small class="text-danger">{{$message}}</small>
            @enderror
    </td>
</tr>
<tr>
    <td>Foto</td>
    <td>:</td>
    <td>
        <input type="file" class="form-control" name="file" >
        @error('file')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </td>
</tr>

