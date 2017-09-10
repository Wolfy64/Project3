<div clas="view hm-black-strong">
    <div class="full-bg-img flex center">
        <div class= "container">

            <p>
                <h3 class="text-center">Sign In</h3>
            </p>

            <div class="border border-secondary bg-light rounded m-3 p-2">

                    <form action="/admin/signIn" method="POST">

                        <p>
                            <label for="">Enter your password</label>
                        </p>
                
                        <div class="form-row">
                
                            <div class="col-lg-6">
                                <input type="text" name="user" placeholder="User" class="form-control" required >
                            </div>
                
                            <div class="col-lg-6 input-group">
                                
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