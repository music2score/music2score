<!--

*** Thanks for checking out the Best-README-Template. If you have a suggestion

*** that would make this better, please fork the repo and create a pull request

*** or simply open an issue with the tag "enhancement".

*** Thanks again! Now go create something AMAZING! :D

***

***

***

*** To avoid retyping too much info. Do a search and replace for the following:

*** github_username, repo_name, twitter_handle, email, music2score, project_description

-->

<!-- PROJECT SHIELDS -->

<!--

*** I'm using markdown "reference style" links for readability.

*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).

*** See the bottom of this document for the declaration of the reference variables

*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.

*** https://www.markdownguide.org/basic-syntax/#reference-style-links

-->

[![Contributors][contributors-shield]][contributors-url] [![Forks][forks-shield]][forks-url] [![Stargazers][stars-shield]][stars-url] [![Issues][issues-shield]][issues-url] [![MIT License][license-shield]][license-url] [![Release][release-shield]][release-url]

<!-- PROJECT LOGO -->

<br  />

<p  align="center" style="text-align: center;"> <a href="https://raw.githubusercontent.com/music2score/music2score/main/pages/images/logo.png" > 
<img  src="https://raw.githubusercontent.com/music2score/music2score/main/pages/images/logo.png"  alt="Logo"  width="80"  height="auto" style="text-align: center;"> </a> </p>


<h3  align="center">music2score</h3>

<p> The goal of Music2Score is to facilitate the ability to generate sheet music from midi files. We want to eliminate the problem of being able to play music from only a limited selection that is commonly available. Also manually searching the internet for the desired sheet music is time consuming and tiring. Therefore we created Music2Score to eliminate all those problems while adding additional features such as the the ability to convert one’s own unpublished music </p>
            
<p>We aim to further increase the supported file types for conversion in future releases. Music2Score also provides an interactive and intiutive web interface for easy to use music sheet generation functionality which can be extended to support more functionality in future.</p>
<br  />
<br  />
<p  align="center"><a  href="https://www.music2score.xyz/">View Demo</a> . <a  href="https://github.com/music2score/music2score/issues">Report Bug</a> · <a  href="https://github.com/music2score/music2score/issues">Request Feature</a>  </p>

<!-- TABLE OF CONTENTS -->

<details  open="open">

<summary><h2  style="display: inline-block">Table of Contents</h2></summary>

<ol> 
<li> 
<a  href="#about-the-project">About The Project</a>
<ul>
<li><a  href="#built-with">Built With</a></li> 
</ul> 
</li> 
<li>
<a  href="#getting-started">Getting Started</a>
<ul>
<li><a  href="#prerequisites">Prerequisites</a></li>
<li><a  href="#installation">Installation</a></li>
</ul>
</li>
<li><a  href="#usage">Usage</a></li>
<li><a  href="#roadmap">Roadmap</a></li>
<li><a  href="#contributing">Contributing</a></li>
<li><a  href="#license">License</a></li>
<li><a  href="#contact">Contact</a></li>
<li><a  href="#acknowledgements">Acknowledgements</a></li>
</ol>

</details>

<!-- ABOUT THE PROJECT -->

## About The Project

<p> <a href="https://raw.githubusercontent.com/music2score/music2score/main/pages/images/navbar_logo.png" > 
<img  src="https://raw.githubusercontent.com/music2score/music2score/main/pages/images/navbar_logo.png"  alt="Logo"  width="auto"  height="80" style="text-align: center;"> </a> </p>

<p>The Project is developed in containerised environment to facilitate easy setup and deployment. The Project supports simulatenously running multiple conversion containers concurrently which makes it scalable for commerical use.</p>


### Built With

- [Bootstrap](https://getbootstrap.com)
- [JQuery](https://jquery.com)
- [corePHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [Python](https://www.python.org/)

<!-- GETTING STARTED -->

## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

Install Docker Engine on your computer.

[Docker Installation Guide](https://docs.docker.com/engine/install/)

### Installation

1. Clone the repo

```sh
git clone https://github.com/music2score/music2score.git
```

2. Navigate to docker folder

```sh
cd 'music2score/docker/'
```

3. Start Containers using docker compose

```sh
docker-compose up -d
```

4. Wait for containers to spin up

<!-- USAGE EXAMPLES -->

## Usage

After the local installation is complete, the web portal can be accessed normally through a web browser by visiting

```sh
http://localhost/
```

_For running demo, please visit the [Demo](https://music2score.xyz)_

<!-- ROADMAP -->

## Roadmap

See the [open issues](https://github.com/music2score/music2score/issues) for a list of proposed features (and known issues).

<!-- CONTRIBUTING -->

## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project

2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)

3. Run Tests
<ol>
<ul>
<li>Codeception</li>
</ul>
</ol>

```sh
docker-compose run --rm codecept -c codeception/
```

<ol>
<ul>
<li>Visual Regression</li>
</ul>
</ol>

```sh
docker-compose run --rm visual_regression_tests test
```

<ol>
<ul>
<li>PyTests</li>
</ul>
</ol>

```sh
docker-compose run --rm pytest
```

5. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)

6. Push to the Branch (`git push origin feature/AmazingFeature`)

7. Open a Pull Request

<!-- LICENSE -->

## License

Distributed under the MIT License. See `LICENSE` for more information.

<!-- CONTACT -->

## Contact

Christopher Gus Mannes - [Linkedin](https://www.linkedin.com/in/christopher-mannes-348356b9/)

Ibrahim Hassan - [Linkedin](https://www.linkedin.com/in/mibrahimhassan/)

Mudit Singh - [Linkedin](https://www.linkedin.com/in/mudit-singh-team/)

Sai Anurag Neelisetty - [Linkedin](https://www.linkedin.com/in/saianurag/)

Yi Cai - [Linkedin](https://www.linkedin.com/in/yi-cai-800b8a172/)

Ze Sheng - [Linkedin](https://www.linkedin.com/in/ze-sheng-a389691b2/)

Project Link: [Github](https://github.com/music2score/music2score)

<!-- ACKNOWLEDGEMENTS -->

## Acknowledgements

- [Img Shields](https://shields.io)

- [Choose an Open Source License](https://choosealicense.com)

- [GitHub Pages](https://pages.github.com)

- [Font Awesome](https://fontawesome.com)

- [CircleCI](https://circleci.com/)

- [Kubernetes](https://kubernetes.io/)

- [Docker](https://www.docker.com/)

- [Codeception](https://codeception.com/)

- [Visual Regression - BackstopJS](https://github.com/garris/BackstopJS)

- [PyTest](https://docs.pytest.org/en/stable/)

- [PhpMyAdmin](https://www.phpmyadmin.net/)

- [Readme Template](https://github.com/othneildrew/Best-README-Template)

<!-- MARKDOWN LINKS & IMAGES -->

<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[contributors-shield]: https://img.shields.io/github/contributors/music2score/music2score.svg?style=for-the-badge
[contributors-url]: https://github.com/music2score/music2score/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/music2score/music2score.svg?style=for-the-badge
[forks-url]: https://github.com/music2score/music2score/network/members
[stars-shield]: https://img.shields.io/github/stars/music2score/music2score.svg?style=for-the-badge
[stars-url]: https://github.com/music2score/music2score/stargazers
[issues-shield]: https://img.shields.io/github/issues/music2score/music2score.svg?style=for-the-badge
[issues-url]: https://github.com/music2score/music2score/issues
[license-shield]: https://img.shields.io/github/license/music2score/music2score.svg?style=for-the-badge
[license-url]: https://github.com/music2score/repo/blob/master/LICENSE.txt
[release-shield]: https://img.shields.io/github/v/release/music2score/music2score.svg?style=for-the-badge
[release-url]: https://github.com/music2score/music2score/releases
