<!DOCTYPE html>
<html>
<style>

body {
    margin: 0;
    padding: 0;
   background:#000;
}
* {
    box-sizing: border-box;
}
.maintenance {
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: scroll;
    background-size: cover;
}

.maintenance {
    width: 100%;
    height: 100%;
    min-height: 100vh;
}

.maintenance {
    display: flex;
    flex-flow: column nowrap;
    justify-content: center;
    align-items: center;
}

.maintenance_contain {
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    align-items: center;
    justify-content: center;
    width: 100%;
    padding: 15px;
}
.maintenance_contain img {
    width: auto;
    max-width: 100%;
}
.pp-infobox-title-prefix {
    font-weight: 500;
    font-size: 20px;
    color: #000000;
    margin-top: 30px;
    text-align: center;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

.pp-infobox-title {
    color: #000000;
    font-family: sans-serif;
    font-weight: 700;
    font-size: 40px;
    margin-top: 10px;
    margin-bottom: 10px;
    text-align: center;
    display: block;
    word-break: break-word;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

.pp-infobox-description {
    color: #000000;
    font-family: "Poppins", sans-serif;
    font-weight: 400;
    font-size: 18px;
    margin-top: 0px;
    margin-bottom: 0px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    text-align: center;
}

.pp-infobox-description p {
    margin: 0;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

</style>
<body>

    <div class="maintenance" style="background-image: url('{{ asset('frontend_assets/assets/img/md.jpg') }}');">
        <div class="maintenance_contain">
          <div class="pp-infobox-title-wrapper">
                <h3 class="pp-infobox-title" style="color: whitesmoke">This website is currently under maintenance!</h3>
            </div>
            <div class="pp-infobox-description" style="color: whitesmoke">
              <p>Due to some technical issue we have to temporarily shut down the website for some time.
                <br> But we promise to resolve this issue very soon. Sorry for the inconvenience.</p>
            </div>
        </div>
      </div>

</body>
</html>
