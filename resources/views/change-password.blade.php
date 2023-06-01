<form action="{{ route('Employe.updatePassword') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="current_password">Current Password</label>
        <input type="password" name="current_password" id="current_password" class="form-control">
    </div>

    <div class="form-group">
        <label for="password">New Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm New Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Change Password</button>
</form>
@error('current_password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
