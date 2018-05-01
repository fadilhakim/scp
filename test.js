function createObj(arr)
{
    result = {};

    result.name = arr[0],
    result.profession = arr[1];

    return result;
}

console.log(createObj(["Dimas","Web Developer"]));