declare function moment(): moment.Moment;
declare function moment(date: number): moment.Moment;
declare function moment(date: number[]): moment.Moment;
declare function moment(date: string, format?: string, strict?: boolean): moment.Moment;
declare function moment(date: string, format?: string, language?: string, strict?: boolean): moment.Moment;
declare function moment(date: string, formats: string[], strict?: boolean): moment.Moment;
declare function moment(date: string, formats: string[], language?: string, strict?: boolean): moment.Moment;
declare function moment(date: string, specialFormat: () => void, strict?: boolean): moment.Moment;
declare function moment(date: string, specialFormat: () => void, language?: string, strict?: boolean): moment.Moment;
declare function moment(date: string, formatsIncludingSpecial: any[], strict?: boolean): moment.Moment;
declare function moment(date: string, formatsIncludingSpecial: any[], language?: string, strict?: boolean): moment.Moment;
declare function moment(date: Date): moment.Moment;
declare function moment(date: moment.Moment): moment.Moment;
declare function moment(date: Object): moment.Moment;

declare namespace moment {
  type formatFunction = () => string;

  interface MomentDateObject {
    years?: number;
    /* One digit */
    months?: number;
    /* Day of the month */
    date?: number;
    hours?: number;
    minutes?: number;
    seconds?: number;
    milliseconds?: number;
  }

  interface MomentLanguageData extends BaseMomentLanguage {
    /**
    * @param formatType should be L, LL, LLL, LLLL.
    */
    longDateFormat(formatType: string): string;
  }

  interface Duration {
    humanize(withSuffix?: boolean): string;

    as(units: string): number;

    milliseconds(): number;
    asMilliseconds(): number;

    seconds(): number;
    asSeconds(): number;

    minutes(): number;
    asMinutes(): number;

    hours(): number;
    asHours(): number;

    days(): number;
    asDays(): number;

    months(): number;
    asMonths(): number;

    years(): number;
    asYears(): number;

    add(n: number, p: string): Duration;
    add(n: number): Duration;
    add(d: Duration): Duration;

    subtract(n: number, p: string): Duration;
    subtract(n: number): Duration;
    subtract(d: Duration): Duration;

    toISOString(): string;
    toJSON(): string;
  }

  interface MomentInput {
    /** Year */
    years?: number;
    /** Year */
    year?: number;
    /** Year */
    y?: number;

    /** Month */
    months?: number;
    /** Month */
    month?: number;
    /** Month */
    M?: number;

    /** Week */
    weeks?: number;
    /** Week */
    week?: number;
    /** Week */
    w?: number;

    /** Day/Date */
    days?: number;
    /** Day/Date */
    day?: number;
    /** Day/Date */
    date?: number;
    /** Day/Date */
    d?: number;

    /** Hour */
    hours?: number;
    /** Hour */
    hour?: number;
    /** Hour */
    h?: number;

    /** Minute */
    minutes?: number;
    /** Minute */
    minute?: number;
    /** Minute */
    m?: number;

    /** Second */
    seconds?: number;
    /** Second */
    second?: number;
    /** Second */
    s?: number;

    /** Millisecond */
    milliseconds?: number;
    /** Millisecond */
    millisecond?: number;
    /** Millisecond */
    ms?: number;
  }

  interface MomentCalendar {
    lastDay?: string | formatFunction;
    sameDay?: string | formatFunction;
    nextDay?: string | formatFunction;
    lastWeek?: string | formatFunction;
    nextWeek?: string | formatFunction;
    sameElse?: string | formatFunction;
  }

  interface MomentRelativeTime {
    future: any;
    past: any;
    s: any;
    m: any;
    mm: any;
    h: any;
    hh: any;
    d: any;
    dd: any;
    M: any;
    MM: any;
    y: any;
    yy: any;
  }

  interface MomentLongDateFormat {
    L: string;
    LL: string;
    LLL: string;
    LLLL: string;
    LT: string;
    LTS: string;
    l?: string;
    ll?: string;
    lll?: string;
    llll?: string;
    lt?: string;
    lts?: string;
  }

  interface MomentParsingFlags {
     empty: b