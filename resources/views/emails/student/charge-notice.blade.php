<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formal Notice of Charge</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f3f3f3; font-family: Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased;">

    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f3f3f3; padding: 40px 20px;">
        <tr>
            <td align="center">

                {{-- Outer card --}}
                <table border="0" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.07); max-width: 100%;">

                    {{-- Header --}}
                    <tr>
                        <td align="center" style="background-color: #590004; padding: 32px 24px; border-bottom: 4px solid #a50104;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 22px; font-weight: bold; letter-spacing: 1px;">Cagayan State University</h1>
                            <p style="color: #f3f3f3; margin: 6px 0 0 0; font-size: 13px; opacity: 0.85; letter-spacing: 0.5px;">Office of Student Development and Welfare</p>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding: 40px 40px 30px 40px;">

                            <h2 style="color: #250001; margin: 0 0 8px 0; font-size: 20px; font-weight: bold;">Formal Notice of Charge</h2>
                            <p style="color: #718096; margin: 0 0 24px 0; font-size: 13px;">Case No. {{ $record->case_tracking_number }}</p>

                            <p style="color: #4a5568; line-height: 1.7; margin: 0 0 24px 0; font-size: 15px;">
                                Dear <strong>{{ $student->name }}</strong>,
                            </p>

                            <p style="color: #4a5568; line-height: 1.7; margin: 0 0 24px 0; font-size: 15px;">
                                This is to formally notify you that a disciplinary charge has been filed against you under the CSU Student Conduct Code. You are required to submit a written answer or defense within the deadline specified below.
                            </p>

                            {{-- Case details box --}}
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f3f3f3; border-radius: 6px; margin-bottom: 24px;">
                                <tr>
                                    <td style="padding: 22px 24px;">
                                        <p style="margin: 0 0 14px 0; font-size: 11px; color: #718096; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Case Details</p>

                                        <p style="margin: 0 0 10px 0; font-size: 14px; color: #250001;">
                                            <strong>Case Number:</strong>&nbsp;
                                            <span style="font-family: 'Courier New', Courier, monospace;">{{ $record->case_tracking_number }}</span>
                                        </p>

                                        <p style="margin: 0 0 10px 0; font-size: 14px; color: #250001;">
                                            <strong>Offense:</strong>&nbsp;
                                            {{ $record->offenseRule?->code }} &mdash; {{ $record->offenseRule?->title }}
                                        </p>

                                        <p style="margin: 0 0 10px 0; font-size: 14px; color: #250001;">
                                            <strong>Category:</strong>&nbsp;
                                            {{ $record->offenseRule?->category ?? 'N/A' }}
                                        </p>

                                        <p style="margin: 0 0 10px 0; font-size: 14px; color: #250001;">
                                            <strong>Date of Incident:</strong>&nbsp;
                                            {{ $record->date_of_incident?->format('F d, Y') }}
                                        </p>

                                        <p style="margin: 0; font-size: 14px; color: #250001;">
                                            <strong>Charge Filed:</strong>&nbsp;
                                            {{ $record->charge_filed_date?->format('F d, Y') }}
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Deadline warning --}}
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-left: 4px solid #d69e2e; background-color: #fffff0; border-radius: 0 4px 4px 0; margin-bottom: 24px;">
                                <tr>
                                    <td style="padding: 14px 18px;">
                                        <p style="margin: 0 0 4px 0; font-size: 13px; color: #744210; font-weight: bold;">Response Deadline</p>
                                        <p style="margin: 0; font-size: 15px; color: #744210; line-height: 1.5; font-weight: bold;">
                                            {{ $record->answer_deadline?->format('F d, Y') }}
                                        </p>
                                        <p style="margin: 4px 0 0 0; font-size: 13px; color: #744210; line-height: 1.5;">
                                            You have five (5) class days from receipt of this notice to submit your written answer or defense through the student portal.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Ex parte warning --}}
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-left: 4px solid #a50104; background-color: #fff5f5; border-radius: 0 4px 4px 0; margin-bottom: 32px;">
                                <tr>
                                    <td style="padding: 14px 18px;">
                                        <p style="margin: 0 0 4px 0; font-size: 13px; color: #a50104; font-weight: bold;">Important</p>
                                        <p style="margin: 0; font-size: 13px; color: #a50104; line-height: 1.5;">
                                            If no written response is received by the deadline, the case may proceed ex parte in accordance with CSU Student Conduct Code Section G.9.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            {{-- CTA button --}}
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center">
                                        <a href="{{ route('student.records.show', $record) }}"
                                           style="display: inline-block; background-color: #590004; color: #ffffff; font-weight: bold; font-size: 15px; text-decoration: none; padding: 14px 32px; border-radius: 6px; border: 1px solid #250001; letter-spacing: 0.3px;">
                                            View Case &amp; Submit Response
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td align="center" style="padding: 24px 40px; border-top: 1px solid #e2e8f0; background-color: #fafafa;">
                            <p style="margin: 0 0 8px 0; font-size: 12px; color: #a0aec0; line-height: 1.5;">
                                This is an automated message generated by the Office of Student Development and Welfare.<br>
                                Please do not reply to this email. For inquiries, visit the OSDW office.
                            </p>
                            <p style="margin: 0; font-size: 12px; color: #a0aec0;">
                                &copy; {{ date('Y') }} Cagayan State University. All rights reserved.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
