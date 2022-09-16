<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @OA\Schema(
 *      type="object",
 *      schema="measure",
 *      @OA\Property(
 *          property="data",
 *          type="float",
 *          description="measure value"
 *      )
 * )
 */
class TemplateController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/template",
     *      tags={"measures"},
     *      summary="Get all measures",
     *      description="Get all measures sorted by creation date",
     *      @OA\Parameter(
     *          name="startDate",
     *          in="query",
     *          required=false,
     *          description="Min date of the first measure (default: none)",
     *          @OA\Schema(type="timestamp", default="none"),
     *          example="2019-01-01T00:00:00.000Z"),
     *      @OA\Response(response="200", description="Array of measures")
     * )
     */
    public function index(Request $request): Response
    {
        return $this->ok();
    }
}
