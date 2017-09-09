<h1>Change your password</h1>

<div class="col-lg">

    <form action="/admin/newPassword" method="POST">

        <div class="">
            <p>
                <input type="text" name="user" placeholder="user" class="form-control" required >
            </p>
        </div>

        <div class="form-row">

            <div class="col">
                <input type="password" name="pass" placeholder="New password" class="form-control" required >
            </div>

            <div class="col input-group">

                <input type="password" name="pass2" placeholder="Retype your password" class="form-control" required>
                <span class="input-group-btn">
                    <button class="btn btn-success" type="submit">Change it !</button>
                </span>

            </div>

        </div>

    </form>

</div>