

<div class="container mt-5" >
  <h1>BIENVENUE</h1>
    <form method="post" action ="<?=$Constantes::WEB_ROOT."login"?>" > 
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control w-50" name="login" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control w-50" name="password" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>