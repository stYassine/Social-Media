<div class="row">
   <div class="col-md-12">

       <h4>Update Articles</h4>

       <form action="" method="post">
           {{ csrf_field() }}

           <div class="form-group">
               <label for="">Title</label>
               <input type="text" name="title" class="form-control">
           </div>

           <div class="form-group">
               <label for="">Category</label>
               <select name="category_id" class="form-control">
                   <option value="">Choose</option>
               </select>
           </div>

           <div class="form-group">
               <label for="">Article</label>
               <textarea rows="10" name="body" class="form-control"></textarea>
           </div>

           <div class="form-group">
               <button type="submit" class="btn btn-info">Update</button>
           </div>

       </form>

   </div>
</div>