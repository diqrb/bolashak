<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Address;
use App\Models\Benefit;
use App\Models\CompanyStatistic;
use App\Models\Contact;
use App\Models\ContentTranslation;
use App\Models\Coordinate;
use App\Models\Faq;
use App\Models\Feedback;
use App\Models\LogosAndImage;
use App\Models\MainBlock;
use App\Models\Partner;
use App\Models\Review;
use App\Models\SocialNetwork;
use App\Models\Stock;
use App\Models\StudyingProgram;
use App\Models\WhyChooseUs;
use Illuminate\Http\JsonResponse;

class MainController extends Controller
{
    public function index(): JsonResponse
    {
        $language = request()->header('Accept-Language');

        if (!$language) {
            $language = 'ru';
        }


        $imagePath = env('APP_URL') . '/storage/';

        $mainBlock = MainBlock::query()
                              ->first()
                              ->translate($language)
        ;

        $companyStatistic = CompanyStatistic::query()
                                            ->get()
                                            ->translate($language)
        ;

        $whyChooseUs = WhyChooseUs::query()
                                  ->first()
                                  ->translate($language)
        ;
        $benefits    = Benefit::all()
                              ->translate($language)
        ;

        $studyingPrograms = StudyingProgram::all()
                                           ->translate($language)
        ;

        $stock = Stock::query()
                      ->first()
                      ->translate($language)
        ;

        $faq = Faq::all()
                  ->translate($language)
        ;

        $reviews = Review::all()
                         ->translate($language)
        ;

        $partners = Partner::all();

        $contacts = Contact::query()
                           ->first()
        ;

        $addresses = Address::all()
                            ->translate($language)
        ;

        $socialNetworks = SocialNetwork::all();

        $coordinate = Coordinate::query()
                                ->first()
        ;

        $images = LogosAndImage::query()
                               ->first()
        ;

        foreach ($benefits as $benefit) {
            $benefit->image = json_decode($benefit->image, true)[0]['download_link'];
        }

        foreach ($socialNetworks as $socialNetwork) {
            $socialNetwork->image = json_decode($socialNetwork->image, true)[0]['download_link'];
        }
        $images->main_logo   = json_decode($images->main_logo, true)[0]['download_link'];
        $images->footer_logo = json_decode($images->footer_logo, true)[0]['download_link'];

        $translations = ContentTranslation::query()
                                          ->first()
                                          ->translate($language)
        ;

        return response()->json([
                                    'imagePath'        => $imagePath,
                                    'images'           => $images,
                                    'translations'     => $translations,
                                    'mainBlock'        => $mainBlock,
                                    'companyStatistic' => $companyStatistic,
                                    'whyChooseUs'      => $whyChooseUs,
                                    'benefits'         => $benefits,
                                    'studyingPrograms' => $studyingPrograms,
                                    'stock'            => $stock,
                                    'faq'              => $faq,
                                    'reviews'          => $reviews,
                                    'partners'         => $partners,
                                    'contacts'         => $contacts,
                                    'address'          => $addresses,
                                    'socialNetworks'   => $socialNetworks,
                                    'coordinate'       => $coordinate,
                                ]);
    }

    public function feedback(FeedbackRequest $request): JsonResponse
    {
        try {
        $data = $request->validated();
        Feedback::query()->create($data);
        return response()->json([
                'message' => 'Операция прошла успешно'
                                ]);

        } catch (\Exception $exception) {
            return response()->json([
                                        'message' => 'Произошла ошибка'
                                    ], 418);
        }
    }
}
