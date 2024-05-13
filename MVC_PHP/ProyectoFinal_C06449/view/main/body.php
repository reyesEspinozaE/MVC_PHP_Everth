<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/view/main/Styles.css">
    
</head>

<body>
    <div class="container" align-center>
        <div class="lists__pokemons" id="lists__pokemons">

        </div>

        <div class="buttons" id="buttons"></div>
    </div>
</body>
</html>

<script>
    const lists__pokemons = document.getElementById('lists__pokemons')
    const buttons = document.getElementById('buttons')
    let urlPokemon = 'https://pokeapi.co/api/v2/pokemon'
    let btnNext;
    let btnPrevious;
    let templateHtml;
    console.log('⏮⏩')

    const GetPokemons = async (url) => {
        try {
            const response = await fetch(url)
            const results = await response.json();
            console.log(results)
            DataPokemons(results.results)

            btnNext = results.next ? `<button class="btn" data-url=${results.next}>⏩</button>` : ''
            btnPrevious = results.previous ? `<button class="btn" data-url=${results.previous}>⏮</button>` : ''
            buttons.innerHTML = btnPrevious + " " + btnNext


        } catch (error) {
            console.log(error)
        }
    }
    GetPokemons(urlPokemon)

    const DataPokemons = async (data) => {
        lists__pokemons.innerHTML = '';
        try {
            for (let index of data) {

                const resp = await fetch(index.url)
                const resul = await resp.json();
                console.log(resul)
                templateHtml = `
                <div class="pokemon__img">
                <img src=${resul.sprites.other.dream_world.front_default} alt=${resul.name}/>
                <p>${resul.name}</p>
                </div>
                `
                lists__pokemons.innerHTML += templateHtml
            }

        } catch (error) {
            console.log(error)
        }
    }

    buttons.addEventListener('click', (e) => {
        if (e.target.matches('.btn')) {
            let value = e.target.dataset.url
            console.log(value)
            GetPokemons(value)
        }
    })
</script>