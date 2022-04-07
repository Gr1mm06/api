var settings = {
  "url": "http://192.168.0.2:1100/login",
  "method": "POST",
  "timeout": 0,
  "headers": {
    "Content-Type": "application/json",
    "Cookie": "XSRF-TOKEN=eyJpdiI6IkdSc21oZUp5by8xemZIZ2p6bGdaMVE9PSIsInZhbHVlIjoiNzFSRTdsM24wVnZFcFhiTGlBOVR5TmcrOWlwaExWQW5sS0NiL3piUGUweWpqeU1yaXdJYk1TeU10cEJmMnF0L3llSzAvYTlqem9jWmk5ajRsTU5OQ1lUMURsclJya3huN0wwYkxUMUxIaDQ4cFBtc1FxQjRnUis5M2JmcE01V3IiLCJtYWMiOiIyMzU5YjRhY2U0YjI0MTVhNmIxZjEyMGJkNDgzMGZkN2Y4MWY5MjY2ZmY2MDA5ZjZjMDg2ODRiYmU0ZjE3ZTRhIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IjFVdVRlMFJRbzQraWdNSUN3ci9qQXc9PSIsInZhbHVlIjoiQ0ZzZVgzWXVoRFpmaVVwQS9xVFhtZ3hQQW56RVdPUURRVVhLVTNKdGpsVlNHdFl1SzVFb0c3c2dGL3NRN2p6bEVQZDZNdjdsd3NhcWs4ekJBZmRmbTBxdmhodzlXMndWVUwzcHRZZkNzRE1QSnhHakVsREZvVVZYVnUyTzNaQ0YiLCJtYWMiOiJmYjkzZjk0MjhmYTkxZmFjNWFmMjBlY2UzYWIwOThkYmNmZmY0YWYyYTgzMDkxOGMyZTdmNDg4YTFlYmVlY2VkIiwidGFnIjoiIn0%3D"
  },
  "data": JSON.stringify({
    "email": "g@mail.com",
    "password": "123"
  }),
};

$.ajax(settings).done(function (response) {
  console.log(response);
});