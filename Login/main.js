const button = document.getElementById('post-btn');

button.addEventListener('click', async _ => {
  console.log("Hello");
//     fetch('http://packhacks2021.srinath.tech/api/getusers', {mode: 'cors', credentials: 'include'})
// .then(response => response.json())
// .then(data => console.log(data));
  // try {     
  //   const response = await fetch('http://packhacks2021.srinath.tech/api/registernew', {
  //     method: 'POST',
  //     body: {
  //       username: 'apple',
  //       password: 'pie',
  //       firstName: '',
  //       lastName: ''
  //     }
  //   });
  //   console.log('Completed!', response);
  // } catch(err) {
  //   console.error(`Error: ${err}`);
//   // }
  const config = {
    headers: {
      // "Access-Control-Allow-Origin": "*",
     
      "Content-Type": "application/x-www-form-urlencoded", 
      // "Accept": "*/*",
      "Connection": "keep-alive",
      // "Accept-Encoding": "gzip, deflate, br",

    }
  };

  const newPost = {
          body: {
        username: 'testUser',
        password: 'testPassword',
        firstName: '',
        lastName: ''
      }
  };


 axios
	.post(
		"http://packhacks2021.srinath.tech/api/registernew",
		newPost,
		config
	)
	.then((response) => console.log(response.data))
	.catch((error) => console.log(error.response));

});