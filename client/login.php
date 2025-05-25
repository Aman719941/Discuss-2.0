<div class="container">
    <h1 class="heading margin-bottom-15 margin-top-15"> Login </h1>


    <form method="post" action="./server/requests.php">

        <div class="mb-3">
            <label for="email" class="form-label bold">User  Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"  placeholder="Enter user Email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label bold">User Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter user password" required>
        </div>
        
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
            <label class="form-check-label" for="exampleCheck1">Check me out [ We'll never share your credentials with anyone else. ]</label>
        </div>

        <button type="submit" class="btn btn-primary bold margin-bottom-15" name="login">Login</button>
    </form>

</div>