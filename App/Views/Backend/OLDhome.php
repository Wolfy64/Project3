<div class="container">
    
    <div class="row">

        <div class="col-12">
            
            <!-- Report Comment -->
            <a href="manageReport">

                <button type="button" class="btn-admin amber">
                    <p>
                        <i class="fa fa-exclamation-circle fa-3x"></i>
                    </p>
                    <p>
                        <?= $data['reportCount'] ?> comment(s) reported
                    </p>
                </button>
                
            </a>
        
            <!-- Show Post -->
            <a href="managePost">
        
                <button type="" class="btn-admin green">
                    <p>
                        <i class="fa fa-newspaper-o fa-3x"></i>
                    </p>
                    <p>
                        <?= $data['postCount'] ?> posts published
                    </p>
                </button>
        
            </a>
        
            <!-- Show Comment -->
            <a href="manageComment">
        
                <button type="" class="btn-admin blue">
                    <p>
                        <i class="fa fa-comment-o fa-3x"></i>
                    </p>
                    <p>
                        <?= $data['commentCount'] ?> users comment
                    </p>
                </button>
        
            </a>
    
        </div>
    
        <div class="col-12">
    
            <!-- New Post -->
            <a href="writePost">
        
                <button type="" class="btn-admin indigo">
                    <p>
                        <i class="fa fa-pencil fa-3x"></i>
                    </p>
                    <p>
                        Write a post
                    </p>
                </button>
        
            </a>
        
            <!-- Settings -->
            <a href="settings">
        
                <button type="" class="btn-admin blue-grey">
                    <p>
                        <i class="fa fa-cog fa-3x"></i>
                    </p>
                    <p>
                        Settings
                    </p>
                </button>
        
            </a>
        
            <!-- Sign Out -->
            <a href="/admin/signOut">
        
                <button type="" class="btn-admin red">
                    <p>
                        <i class="fa fa-sign-out fa-3x"></i>
                    </p>
                    <p>
                        Sign Out
                    </p>
                </button>
        
            </a>
            
        </div>
        
    </div>

</div>