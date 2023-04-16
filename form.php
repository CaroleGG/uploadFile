<!-- Formulaires -->
<form class="border rounded p-3 m-5 bg-light" action="profile.php"  method="POST" enctype="multipart/form-data">

        <p><span class="error">* required field</span></p>
                <div>
                <label for="imageUpload">Upload an profile image</label>    
                <input type="file" name="avatar" id="imageUpload" />
                </div>
                <div>
                <label  for="lastname" class="form-label" required>Nom :</label>
                <input  type="text"  id="lastname"  name="lastname">
                <span class="error">* </span>
                </div>
                <div>
                <label  for="firstname" class="form-label" required>Prénom :</label>
                <input  type="text"  id="firstname"  name="firstname">
                <span class="error">* </span>
                </div>
                <div>
                <label  for="age" class="form-label" required>Age :</label>
                <input  type="text"  id="age"  name="age">
                <span class="error">* </span>
                </div>
                
                <div  class="button" class="text-center">
                <button  type="submit">J'envoie</button>
                </div>
</form>
