<div class="container">
    <h1 class="heading margin-bottom-15 margin-top-15"> Ask A Question </h1>

    <form method="post" action="./server/requests.php">

        <div class="mb-3">
            <label for="title" class="form-label bold">Title</label>
            <input type="text" class="form-control" id="title" name="title"  placeholder="Enter your Question Title " required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label bold">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Describe Your Question" required></textarea>
        </div>
        <div class="mb-3">
            <label for="catagory" class="form-label bold">catagory</label>
            <?php include("catagory.php");?>
            
        </div>


        <button type="submit" class="btn btn-primary bold margin-bottom-15" name="ask">Ask Question</button>
    </form>
</div>