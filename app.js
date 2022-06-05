

const movieList = [
{
    watched: false,
    movieName : "Blade Runner",
    releaseYear: 1980,
    countryOfRelease: "USA",
    note: "",
    starring: ["Harrison Ford", "Sean Young", "Rutger Houer"]

},
{
    watched: false,
    movieName : "Burn After Reading",
    releaseYear: 2005,
    countryOfRelease: "USA",
    note: "",
    starring: ["George Clooney", "Brad Pitt", "John Malcovich","Frances McDormand"]

},
{
    watched: false,
    movieName : "Hereditary",
    releaseYear: 2018,
    countryOfRelease: "USA",
    note: "",
    starring: ["Tony Collete", "Milly Shapiro", "Alex Wolf"]

}
]


function displayMovies(movies){
    let moviesArray = [];

   movies.forEach(  (movie) => {
       
    moviesArray.push(`<tr>
    <td>
    <input type="checkbox" class="form-check-input ml-4" id="checkboxWatched">
    <label class="form-check-label" for="watcheMovie"></label>

    </td>
    <td>${movie.movieName}</td>
    <td>${movie.releaseYear}</td>
    <td>${movie.countryOfRelease}</td>
    <td>${movie.note}</td>
    <td>${movie.starring}</td>
    
</tr>`);
 });
 document.getElementById("moviesTableBody").innerHTML = moviesArray.join(``);

}

function addNewMovie(){




}


displayMovies(movieList);




