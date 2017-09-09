<div class="col-g">
    <!-- Report Comments -->
    <p>
        <a href="manageReport">
            You have <?= $data['reportCount'] ?> comment(s) reported by users
        </a>
    </p>
    
    <!-- New Post -->
    <p>
        <a href="writePost">
            Do you want publish a post today?
        </a>
    </p>
    
    <!-- Show Post -->
    <p>
        <a href="managePost">
            You have <?= $data['postCount'] ?> published posts on your blog
        </a>
    </p>

    <!-- Show Comments -->
    <p>
        <a href="manageComment">
            You have <?= $data['commentCount'] ?> users comments on your blog
        </a>
    </p>

    <!-- Settings -->
    <p>
        <a href="settings">
            Settings
        </a>
    </p>
</div>
