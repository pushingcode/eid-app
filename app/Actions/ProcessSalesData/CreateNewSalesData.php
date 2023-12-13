<?php declare(strict_types=1);

namespace App\Actions\ProcessSalesData;

use App\Mail\DataSaleStored;
use App\Models\Sale;
use Illuminate\Support\Facades\Mail;

class CreateNewSalesData
{
    public function __construct(
        private string $session,
        private string $floating_email_parent,
        private string $floating_email_institution,
        private string $floating_first_name,
        private string $floating_last_name,
        private string $floating_phone,
        private string $floating_company
    )
    {}

    /**
     * 
     */
    public function store(): Sale
    {
        $sales = new Sale();
        $sales->session = $this->session;
        $sales->floating_email_parent = $this->floating_email_parent;
        $sales->floating_email_institution = $this->floating_email_institution;
        $sales->floating_first_name = $this->floating_first_name;
        $sales->floating_last_name = $this->floating_last_name;
        $sales->floating_phone = $this->floating_phone;
        $sales->floating_company = $this->floating_company;

        $sales->save();

        Mail::to($this->floating_email_parent)->send(new DataSaleStored($sales));

        return $sales;
    }
}