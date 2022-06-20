<?php

class AddressController {
    public function index()
    {
        $addresses = [
            'Einsteinstr. 7',
            'Einsteinstrasse 7',
            'Curd-Jürgens-Str. 30',
            'Perlcherstr.88 1',
            'Rosenheimerstr. 14e-f',
            'Bei Fußenkreuz 36',
            'Sankt Georgs Kirchhof 26',
            'Mallertshofener Strasse 36c',
            'Rosenheimerstr. 145 e+f',
            'Hof 151',
            'Wald a.A. 125',
            'Lindenhof 0',
            'Am Elfenholt',
            'Am Schießberg 35 357',
            'Idlhofgasse 16A-1',
            'Kreisbacherstrasse 3/1/19',
            'Höpflergasse 6 / 18',
            'Straße des 17. Juni',
            '10th Avenue, 123',
            '21B Baker St, Merylbone',
        ];

        $data['addresses'] = [];
        foreach($addresses as $address) {
            if (preg_match('/^([^\d]*[^\d\s]) *(\d.*)$/', $address, $match)) {
                $data['addresses'][] = $match;
            }
        }

        return view('address', $data);
    }
}