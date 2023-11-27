const search = document.querySelector('.search-box button');
const error404 = document.querySelector('.not-found');
const container = document.querySelector('.container');
const weatherBox = document.querySelector('.weather-box');
const weatherDetails = document.querySelector('.weather-details');

search.addEventListener('click', () => {
    const APIkey = '61fa76deca8d41c46242bce14451cce9'; 
    const city = document.querySelector('.search-box input').value;

    if (city === '') return;

    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${APIkey}`)
        .then(response => response.json())
        .then(json => {
            if (json.cod === '404') {
                container.style.height = '404px';
                weatherBox.classList.remove('active');
                weatherDetails.classList.remove('active');
                error404.classList.add('active');
            } else {
                container.style.height = '555px';
                weatherBox.classList.add('active');
                weatherDetails.classList.add('active');
                error404.classList.remove('active');

                const image = document.querySelector('.weather-box img');
                const temperature = document.querySelector('.weather-box .temperature');
                const description = document.querySelector('.weather-box .description');
                const humidity = document.querySelector('.info-humidity span');
                const wind = document.querySelector('.info-wind span');

                switch (json.weather[0].main) {
                    case 'Clear':
                        image.src = 'image/clear.png'; // Update with the correct image URL
                        break;
                    case 'Rain':
                        image.src = 'image/rain.png'; // Update with the correct image URL
                        break;
                    case 'Snow':
                        image.src = 'image/snow.png'; // Update with the correct image URL
                        break;
                    case 'Clouds':
                        image.src = 'image/cloud.png'; // Update with the correct image URL
                        break;
                    case 'Mist':
                        image.src = 'image/mist.png'; // Update with the correct image URL
                        break;
                    case 'Haze':
                        image.src = 'image/haze.png'; // Update with the correct image URL
                        break;
                    default:
                        image.src = 'image/cloud.png'; // Update with the correct image URL
                }
                temperature.innerHTML = `${parseInt(json.main.temp)}<span>°C</span>`;
                description.innerHTML = `${json.weather[0].description}`;
                humidity.innerHTML = `${json.main.humidity}%`;
                wind.innerHTML = `${parseInt(json.wind.speed)} km/h`;
            }
            console.log(json);
        });
});
