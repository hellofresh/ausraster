<p align="center">
  <a href="https://hellofresh.com">
    <img width="120" src="https://www.hellofresh.de/images/hellofresh/press/HelloFresh_Logo.png">
  </a>
</p>

# Ausraster

Working with spreadsheets can make you (╯°□°）╯︵ ┻━┻. Ausraster puts a stop to that frustration, by providing a unified, sane interface over various document libraries.

<p align="center"><strong>┳━┳ ノ( ゜-゜ノ)</strong></p>

## Features and Roadmap

- [x] Excel adapter (provided by [PHPExcel](https://github.com/PHPOffice/PHPExcel))
- [x] Fully PSR-2 compliant
- [x] Composer / PSR-4 compliant
- [ ] Test coverage
- [ ] Cell formatting
- [ ] CSV adapter
- [ ] Other adapters to come! Need an adapter? Feel free to [contribute](Contributing.md)!

## Usage
### Installation

```bash
$ composer require hellofresh/ausraster
```

### Bring Your Own Adapter

By itself, Ausraster doesn't do much, as it needs another library to act as an interface to. For example, we can make use of Ausraster's Spreadsheet interfaces if we include [PHPExcel](https://github.com/PHPOffice/PHPExcel):

```bash
$ composer require phpoffice/phpexcel
```

No matter what spreadsheet adapter you use, Ausraster is designed to have the same simple, friendly interface.

```php
require_once 'vendor/autoload.php';

use HelloFresh\Ausraster\Spreadsheet\Coordinate;
use HelloFresh\Ausraster\Spreadsheet\PhpExcel\Document;

$document = new Document;

$worksheet = $document->createWorksheet();

$coordinate = new Coordinate('A', 1);
$cell = $worksheet->getCellAt($coordinate);
$cell->fill('Ausraster rules!');

$document->save('example.xlsx');
```

To see more, check out the [examples folder](https://github.com/hellofresh/ausraster/tree/master/examples).

## Contributing

Thinking of adding an adapter or fixing a bug? Thanks! Please see [CONTRIBUTING.md](CONTRIBUTING.md) before doing so to familiarise yourself with the review process, code of conduct, etc.

## License

[MIT License](LICENSE)
