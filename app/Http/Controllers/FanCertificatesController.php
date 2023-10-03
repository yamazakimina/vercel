<?php

namespace App\Http\Controllers;

use App\Http\Requests\FanCertificatesStoreRequest;
use App\Http\Requests\FanCertificatesUpdateRequest;
use App\Models\FanCertificate;
use Illuminate\Http\RedirectResponse;
use App\Models\Vtuber;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use Exception;

class FanCertificatesController extends Controller
{
    public function index(): View {

        /**
         * @var array<int, FanCertificate> $certificates
         */
        $certificates = FanCertificate::query()
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('fan_certificates/index', compact('certificates'));
    }

    /**
     * @throws Exception
     */
    public function show (
        int $id
    ): View {
        /**
         * @var FanCertificate $certificate
         */
        $certificate = FanCertificate::query()->find($id);
        if ($certificate === null) {
            throw new Exception("Not found the certificate, id:{$id}");
        }

        /**
         * @var Vtuber $vtuber
         */
        $vtuber = Vtuber::query()->find($certificate->vtuber_id);
        if ($vtuber === null) {
            throw new Exception("Not found the vtuber, vtuberId:{$certificate->vtuber_id}");
        }

        return view('fan_certificates/show', compact('certificate', 'vtuber'));
    }

    /**
     * @throws Exception
     */
    public function create(int $vtuberId): View {

        /**
         * @var Vtuber $vtuber
         */
        $vtuber = Vtuber::query()->find($vtuberId);
        if ($vtuber === null) {
            throw new Exception("Not found the vtuber, id:{$vtuberId}");
        }

        return view('fan_certificates/create', compact('vtuber'));
    }

    /**
     * @throws Exception
     */
    public function store(
        FanCertificatesStoreRequest $request,
        int $vtuberId
    ): RedirectResponse {
        $userId = Auth::id();

        /**
         * @var Vtuber $vtuber
         */
        $vtuber = Vtuber::query()->find($vtuberId);
        if ($vtuber === null) {
            throw new Exception("Not found the vtuber, id:{$vtuberId}");
        }

        $existed = FanCertificate::query()
            ->where('user_id', $userId)
            ->where('vtuber_id', $vtuberId)
            ->exists();
        if ($existed) {
            throw new Exception("Already the certificate has been issued!, vtuberId:{$vtuberId}, userId:{$userId}");
        }

        $fanName = $request->validated('fan_name');
        $likes = $request->validated('likes');
        $supportComment = $request->validated('support_comment');

        $certificate = new FanCertificate();
        $certificate->user_id = $userId;
        $certificate->vtuber_id = $vtuberId;
        $certificate->fan_name = $fanName;
        $certificate->likes = $likes;
        $certificate->support_comment = $supportComment;
        $certificate->save();

        return redirect()->route('fan-certificates.show', [ 'id' => $certificate->id ])->with('success', '会員証が発行されました！');
    }

    /**
     * @throws Exception
     */
    public function edit(int $id): View {

        /**
         * @var FanCertificate $certificate
         */
        $certificate = FanCertificate::query()->find($id);
        if ($certificate === null) {
            throw new Exception("Not found the certificate, id:{$id}");
        }

        /**
         * @var Vtuber $vtuber
         */
        $vtuber = Vtuber::query()->find($certificate->vtuber_id);
        if ($vtuber === null) {
            throw new Exception("Not found the vtuber, vtuberId:{$certificate->vtuber_id}");
        }

        return view('fan_certificates/edit', compact('certificate', 'vtuber'));
    }

    /**
     * @throws Exception
     */
    public function update(
        FanCertificatesUpdateRequest $request,
        int $id
    ): RedirectResponse {
        /**
         * @var FanCertificate $certificate
         */
        $certificate = FanCertificate::query()->find($id);
        if ($certificate === null) {
            throw new Exception("Not found the certificate, id:{$id}");
        }

        $fanName = $request->validated('fan_name');
        $likes = $request->validated('likes');
        $supportComment = $request->validated('support_comment');

        $certificate->fan_name = $fanName;
        $certificate->likes = $likes;
        $certificate->support_comment = $supportComment;
        $certificate->save();

        return redirect()->route('fan-certificates.show', [ 'id' => $certificate->id ])->with('success', '会員証が更新されました！');
    }
}
