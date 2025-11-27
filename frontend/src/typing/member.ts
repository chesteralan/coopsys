export type CivilStatus = 'single' | 'married' | 'widowed' | 'divorced' | 'separated';
export type Gender = 'male' | 'female';
export type MemberStatus = "all" | "active" | "inactive";

export interface ApiResponse<T> {
  data: T;
  status: string;
}
export interface CreateMemberResponse {
    member_id: string;
    message: string;
}
export interface MembersResponse {
    items: MemberItem[]
    pager: Pager
}

export interface MemberItem {
  id: string
  first_name: string
  last_name: string
  middle_name: string
  date_of_birth: string
  place_of_birth: string
  religion: string
  age: string
  gender: string
  height_cm: string
  weight_kg: string
  address: string
  contact_number: string
  tax_identification_number: string
  civil_status: string
  educational_elementary: boolean
  educational_highschool: boolean
  educational_vocational: boolean
  educational_college: boolean
  educational_post_grad: boolean
  educational_none: boolean
  vocational_graduate: boolean
  vocational_degree?: string
  college_graduate: boolean
  college_degree?: string
  post_graduate_graduate: boolean
  post_graduate_degree?: string
  occupation_type: string
  employment_status: string
  employer_name?: string
  employer_address?: string
  employer_annual_income?: string
  business_name?: string
  business_address?: string
  business_contact_number?: string
  business_annual_income?: string
  farming: boolean
  fishing: boolean
  livestock_swine: boolean
  livestock_poultry: boolean
  livestock_others?: string
  created_at: CreatedAt
  updated_at: UpdatedAt
}

export interface CreatedAt {
  date: string
  timezone_type: number
  timezone: string
}

export interface UpdatedAt {
  date: string
  timezone_type: number
  timezone: string
}

export interface Pager {
  current: number
  perPage: number
  total: number
  links: string
}
