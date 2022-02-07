<?php include __DIR__ . '/server/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <title>Document</title>
</head>
<body>

    <main id="app">


        <div class="container">
            <div class="row">

                <div class="select-section">
                    <select  v-model="selected.cambio" @change="getCard()" name="" id="">
                        <option value="all" selected>all</option>
                        <option v-for="(element, index) in cambio" :key="index" :value="element">{{element}}</option>
                    </select>

                    <select  v-model="selected.size" @change="getCard()" name="" id="">
                        <option value="all" selected>all</option>
                        <option v-for="(element, index) in size" :key="index" :value="element">{{element}}</option>
                    </select>

                    <select  v-model="selected.bagagli" @change="getCard()" name="" id="">
                        <option value="all" selected>all</option>
                        <option v-for="(element, index) in bagagli" :key="index" :value="element">{{element}}</option>
                    </select>
                </div>

                    <div v-show="fitredCards == null" v-for="(element, index) in cards" :key="element.codice_auto" class="card align-items-center">
                        <img :src="element.foto" :alt="element.Modello" class="img-fluid">
                        <h1>{{element.Modello}}</h1>
                        <span class="mt-2">Cambio: {{element.Cambio}}</span>
                        <span class="pb-3">max Persone: {{element.Persone}}</span>
                        <span class="pb-3">Porte: {{element.Porte}}</span>
                        <span class="pb-3">max Bagagli: {{element.Bagagli}}</span>
                    </div>

                    <div v-show="fitredCards != null" v-for="(element, index) in fitredCards" :key="element.codice_auto" class="card align-items-center">
                        <img :src="element.foto" :alt="element.Modello" class="img-fluid">
                        <h1>{{element.Modello}}</h1>
                        <span class="mt-2">Cambio: {{element.Cambio}}</span>
                        <span class="pb-3">max Persone: {{element.Persone}}</span>
                        <span class="pb-3">Porte: {{element.Porte}}</span>
                        <span class="pb-3">max Bagagli: {{element.Bagagli}}</span>
                    </div>

            </div>
        </div>

    </main>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>