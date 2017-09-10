<div class="container">
        
    <p>
        <h3 class="text-center">Settings</h3>
    </p>
    
    <div class="border border-secondary bg-light rounded m-3 p-2">

        <div class="col-lg">
        
            <form action="/admin/newPassword" method="POST">
                <p>
                    <label for="">Change your password</label>
                </p>

                <div>
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
                            <button class="btn btn-secondary" type="submit">Change it !</button>
                        </span>
        
                    </div>
        
                </div>
        
            </form>
        
        </div>

    </div>
  
</div>