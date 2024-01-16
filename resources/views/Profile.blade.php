@include('header')

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>

<div
    class="container"
>
<form action="{{ route('createProfile') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="image" class="form-label">Profile Image</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>
    <div class="mb-3">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="genderDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Gender
            </button>
            <div class="dropdown-menu" aria-labelledby="genderDropdown">
                <a class="dropdown-item" href="#" data-value="Male">Male</a>
                <a class="dropdown-item" href="#" data-value="Female">Female</a>
                <a class="dropdown-item" href="#" data-value="Others">Others</a>
            </div>
            <input type="hidden" name="gender" id="selectedGender" value="">
        </div>
    </div>

    <div class="mb-3">
        <label for="location" class="form-label">Location:</label>
        <input type="text" name="location" id="location" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Create Profile</button>
</form>

</div>

        </main>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.dropdown-item').click(function() {
            var selectedValue = $(this).data('value');
            $('#selectedGender').val(selectedValue);
            $('#genderDropdown').text(selectedValue);
        });
    });
</script>
