<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use chillerlan\QRCode\{QRCode, QROptions};
use Intervention\Image\Facades\Image;

/**
 * @property int id
 * @property ?float quantity
 * 
 * @property string name
 * @property string code
 * @property ?string series
 * @property ?string sicoin_gl
 * @property ?string description
 * @property ?string observations
 */
class Item extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function generateQR()
    {
        $options = new QROptions;

        $options->outputType          = QRCode::OUTPUT_IMAGE_JPG;
        $options->scale               = 10;
        $options->jpegQuality         = 100;
        $options->outputBase64        = false;
        $options->bgColor             = [200, 150, 200];
        $options->imageTransparent    = true;

        $options->drawCircularModules = true;
        $options->drawLightModules    = true;
        $options->circleRadius        = 0.4;

        $QR = (new QRCode($options))->render(route('view.item', $this->id));

        Image::make($QR)->save($this->getQRPath());
    }

    public function getQRPath(): string
    {
        return 'generate/qr/item ' . $this->code . '.jpg';
    }

    public function sheetsdetail(){
        return $this->belongsTo(DetailResponsibilitySheet::class, 'id', 'id_item')
                    ->join('responsibility_sheets', 'detail_responsibility_sheets.id_responsibilitysheet', '=', 'responsibility_sheets.id');
    }

    public function detail(){
        return $this->belongsTo(DetailResponsibilitySheet::class,'id', 'id_item');
    }


}
