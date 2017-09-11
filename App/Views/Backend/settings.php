<div clas="view hm-black-strong">
    <div class="full-bg-img flex center">
        <div class= "container">

            <p>
                <h3 class="text-center">Change your password</h3>
            </p>

            <div class="border border-secondary bg-light rounded m-3 p-2">

                    <form action="/admin/newPassword" method="POST">

                        <p>
                            <label for="">Enter your password</label>
                        </p>
                
                        <div class="form-row">
                
                            <div class="col-lg-12">
                                <p>
                                    <input type="text" name="user" placeholder="user" class="form-control" required>
                                </p>
                            </div>
                
                            <p>
                                <div class="col-lg-6 input-group">
                                        <input type="password" name="pass" placeholder="New password" class="form-control" required>
                                </div>
    
                                <div class="col-lg-6 input-group">
                                        <input type="password" name="pass2" placeholder="Retype your password" class="form-control" required>
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="submit">Enter</button>
                                        </span>
                                </div>
                            </p>
                
                        </div>
                
                    </form>
            </div>
            
        </div>
    </div>
</div>