<div class="container">
    
    <div class="col-lg">

        <p>
            <h3 class="text-center">Sign In</h3>
        </p>

        <div class="border border-secondary bg-light rounded m-3 p-2">
            
            <div class="col-lg">
                
                <form action="/admin/signIn" method="POST">

                    <p>
                        <label for="">Enter your password</label>
                    </p>
            
                    <div class="form-row">
            
                        <div class="col">
                            <input type="text" name="user" placeholder="User" class="form-control" required >
                        </div>
            
                        <div class="col input-group">
            
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit">Enter</button>
                            </span>
            
                        </div>
            
                    </div>
            
                </form>

            </div>


        </div>
    
    
    </div>

</div>
