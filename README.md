# Laravel starter kit

My personal laravel starter kit template with [Tabler](https://tabler.io/admin-template) admin dashboard.

[![tests](https://github.com/kadirzengin215/tablaradmin/actions/workflows/tests.yml/badge.svg)](https://github.com/kadirzengin215/tablaradmin/actions/workflows/tests.yml)
[![GitHub License](https://img.shields.io/github/license/kadirzengin215/tablaradmin)
](LICENSE)

## Installation

Clone the repository to your local machine.

```bash
git clone https://github.com/kadirzengin215/tablaradmin.git
```

Navigate into the project directory.

```bash
cd tablaradmin
```

Copy the example environment file to create your own `.env` file.

```bash
cp .env.example .env
```

Make sure to configure your `.env` file with the correct database and other personal settings.

Run the installation script to set up the project dependencies and environment.

```bash
composer run:installation
```

## Testing

```bash
composer test
```

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).
