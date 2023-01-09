
<tr>
    <td>Nama</td>
    <td>:</td>
    <td>
        <input type="text" class="form-control" name="nama" value="{{ old('nama', $user['nama']) }}">
            @error('nama')
            <small class="text-danger">{{$message}}</small>
            @enderror
    </td>
</tr>
<tr>
    <td>Email</td>
    <td>:</td>
    <td>
        <input type="text" class="form-control" name="email" value="{{ old('email', $user['email']) }}">
        @error('email')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </td>
</tr>
<tr>
    <td>Phone</td>
    <td>:</td>
    <td>
        <input type="text" class="form-control" name="phone" value="{{ (old('phone', $user['phone']))  }}">
        @error('phone')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </td>
</tr>

<tr>
    <td>NIK</td>
    <td>:</td>
    <td>
        <input type="text" class="form-control" name="nik" value="{{ (old('nik', $user['nik']))  }}">
        @error('nik')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </td>
</tr>
<tr>
    <td>Tgl Lahir</td>
    <td>:</td>
    <td>
        <input type="date" class="form-control" name="dob" value="{{ date('Y-m-d', (old('dob',$user['dob']))) }}">
        @error('dob')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </td>
</tr>
<tr>
    <td>Berat Badan</td>
    <td>:</td>
    <td>
        <input type="text" class="form-control" name="berat_badan" value="{{ (old('berat_badan', $user['berat_badan']))  }}">
        @error('berat_badan')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </td>
</tr>
